<%@page import="entity.Clientes"%>
<%@page import="model.ClienteDao"%>
<%@page import="java.io.IOException"%>
<%@page import="com.google.gson.Gson"%>

<%
    // Establece el tipo de contenido de la respuesta como JSON
    response.setContentType("application/json");
    response.setCharacterEncoding("UTF-8");

    // Inicializar el mensaje de respuesta
    String message;
    Gson gson = new Gson();

    // Solo procesar si el método es POST
    if ("POST".equalsIgnoreCase(request.getMethod())) {
        try {
            // Obtener el parámetro "codigo" del cliente a eliminar
            String codigoParam = request.getParameter("codigo");

            // Verificar que el código esté presente y sea numérico
            if (codigoParam != null && !codigoParam.isEmpty()) {
                int codigo = Integer.parseInt(codigoParam);

                // Crear un objeto Clientes solo con el código
                Clientes cliente = new Clientes();
                cliente.setCodigo(codigo);

                // Eliminar el cliente de la base de datos usando ClienteDao
                ClienteDao clienteDao = new ClienteDao();
                int result = clienteDao.eliminar(cliente);

                // Comprobar el resultado de la eliminación
                if (result > 0) {
                    message = gson.toJson("Cliente eliminado exitosamente.");
                } else {
                    message = gson.toJson("No se encontró el cliente o no se pudo eliminar.");
                }
            } else {
                message = gson.toJson("Parámetro 'codigo' es obligatorio.");
            }
        } catch (Exception e) {
            e.printStackTrace();
            message = gson.toJson("Error: " + e.getMessage());
        }
    } else {
        message = gson.toJson("Método de solicitud inválido.");
    }

    // Escribir la respuesta JSON
    response.getWriter().write(message);
    response.getWriter().flush();
%>
