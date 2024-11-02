<%@page import="com.google.gson.Gson"%>
<%@ page import="java.util.List" %>
<%@ page import="entity.Clientes" %>
<%@ page import="model.ClienteDao" %>
<%@ page import="java.io.IOException" %>

<%
    // Initialize ClienteDao and the list for clients
    ClienteDao clienteDao = new ClienteDao();
    List<Clientes> listaClientes = null;

    try {
        // Fetch the list of clients
        listaClientes = clienteDao.listar();
    } catch (Exception e) {
        e.printStackTrace();
    }

    // Set response type to JSON
    response.setContentType("application/json");
    response.setCharacterEncoding("UTF-8");

    // Convert list of clients to JSON
    Gson gson = new Gson();
    String json = gson.toJson(listaClientes);

    // Output JSON directly
    response.getWriter().write(json);
    response.getWriter().flush();
%>
