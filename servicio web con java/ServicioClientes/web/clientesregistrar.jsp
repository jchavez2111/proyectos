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
            String nombre = request.getParameter("nombre");
            String dni = request.getParameter("dni");
            String telefono = request.getParameter("telefono");

            // Ensure required fields are present
            if (nombre != null && dni != null && telefono != null) {
                // Create a new Clientes object without codigo
                Clientes cliente = new Clientes(0, nombre, dni, telefono);

                // Register the client in the database using ClienteDao
                ClienteDao clienteDao = new ClienteDao();
                int result = clienteDao.registrar(cliente);

                // Check the result of the registration
                if (result > 0) {
                    message = gson.toJson("Cliente registrado");
                } else {
                    message = gson.toJson("Fallo al registrar el cliente.");

                }
            } else {
                message = gson.toJson("Parámetros requeridos faltantes.");

            }
        } catch (Exception e) {
            e.printStackTrace();
            message = gson.toJson("Error: " + e.getMessage());
        }
    } else {
        message = gson.toJson("Método de solicitud no válido.");

    }

    // Write the JSON response
    response.getWriter().write(message);
    response.getWriter().flush();
%>
