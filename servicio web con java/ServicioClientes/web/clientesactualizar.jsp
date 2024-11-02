<%@page import="entity.Clientes"%>
<%@page import="model.ClienteDao"%>
<%@page import="java.io.IOException"%>
<%@page import="com.google.gson.Gson"%>

<%
    // Set the response content type to JSON
    response.setContentType("application/json");
    response.setCharacterEncoding("UTF-8");

    // Initialize the response message
    String message;
    Gson gson = new Gson();

    // Process only if the method is POST
    if ("POST".equalsIgnoreCase(request.getMethod())) {
        try {
            // Retrieve parameters from the request
            String codigoParam = request.getParameter("codigo");
            String nombre = request.getParameter("nombre");
            String dni = request.getParameter("dni");
            String telefono = request.getParameter("telefono");

            // Check that all required parameters are provided
            if (codigoParam != null && nombre != null && dni != null && telefono != null) {
                int codigo = Integer.parseInt(codigoParam);

                // Create a new Clientes object with the updated information
                Clientes cliente = new Clientes(codigo, nombre, dni, telefono);

                // Update the client in the database using ClienteDao
                ClienteDao clienteDao = new ClienteDao();
                int result = clienteDao.actualizar(cliente);

                // Check the result of the update operation
                if (result > 0) {
                    message = gson.toJson("Cliente actualizado");
                } else {
                    message = gson.toJson("Failed to update client.");
                }
            } else {
                message = gson.toJson("Missing required parameters.");
            }
        } catch (Exception e) {
            e.printStackTrace();
            message = gson.toJson("Error: " + e.getMessage());
        }
    } else {
        message = gson.toJson("Invalid request method.");
    }

    // Write the JSON response
    response.getWriter().write(message);
    response.getWriter().flush();
%>
