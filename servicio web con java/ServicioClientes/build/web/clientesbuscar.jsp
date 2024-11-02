<%@page import="entity.Clientes"%>
<%@page import="model.ClienteDao"%>
<%@page import="java.util.List"%>
<%@page import="java.io.IOException"%>
<%@page import="com.google.gson.Gson"%>

<%
    // Initialize ClienteDao and the client variable
    ClienteDao clienteDao = new ClienteDao();
    Clientes cliente = null;

    // Get the 'codigo' parameter from the request
    String codigoParam = request.getParameter("codigo");

    if (codigoParam != null) {
        try {
            int codigo = Integer.parseInt(codigoParam);
            // Fetch the client by code
            cliente = clienteDao.buscar(codigo);
        } catch (NumberFormatException e) {
            e.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    // Set response type to JSON
    response.setContentType("application/json");
    response.setCharacterEncoding("UTF-8");

    // Convert client object to JSON and output
    Gson gson = new Gson();
    String json = gson.toJson(cliente);
    response.getWriter().write(json);
    response.getWriter().flush();
%>
