package model;

import entity.Clientes;
import database.Conexion;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import service.ICrudDao;

public class ClienteDao implements ICrudDao<Clientes> {

    //variables
    Connection cn;
    PreparedStatement ps;
    ResultSet rs;
    Clientes cli;
    String sql;
    int res;

    @Override
    public int registrar(Clientes t) throws Exception {
        try {
            cn = Conexion.getConnection();
            sql = "insert into clientes(nombre,dni,telefono) values(?,?,?)";
            ps = cn.prepareStatement(sql);
            //preparar los valores de los parametros del comando
            ps.setString(1, t.getNombre());
            ps.setString(2, t.getDni());
            ps.setString(3, t.getTelefono());
            //ejecuta
            res = ps.executeUpdate();
            ps.close();
        } catch (Exception e) {
            throw e;
        } finally {
            try {
                cn.close();
            } catch (SQLException e1) {
            }
        }
        return res;
    }

    @Override
    public int actualizar(Clientes t) throws Exception {
        try {
            cn = Conexion.getConnection();
            sql = "update clientes set nombre=?,dni=?,telefono=? where codigo=?";
            ps = cn.prepareStatement(sql);
            //preparar los valores de los parametros del comando
            ps.setString(1, t.getNombre());
            ps.setString(2, t.getDni());
            ps.setString(3, t.getTelefono());
            ps.setInt(4, t.getCodigo());
            //ejecuta
            res = ps.executeUpdate();
            ps.close();
        } catch (Exception e) {
            throw e;
        } finally {
            try {
                cn.close();
            } catch (SQLException e1) {
            }
        }
        return res;
    }

    @Override
    public int eliminar(Clientes t) throws Exception {
        try {
            cn = Conexion.getConnection();
            sql = "delete from clientes  where codigo=?";
            ps = cn.prepareStatement(sql);
            //preparar los valores de los parametros del comando
            ps.setInt(1, t.getCodigo());
            //ejecuta
            res = ps.executeUpdate();
            ps.close();
        } catch (Exception e) {
            throw e;
        } finally {
            try {
                cn.close();
            } catch (SQLException e1) {
            }
        }
        return res;
    }

    @Override
    public Clientes buscar(int t) throws Exception {
        cli = null;
        try {
            cn = Conexion.getConnection();
            ps = cn.prepareStatement("select * from clientes where codigo=?");
            //preparar valor del parametro
            ps.setInt(1, t);
            //ejecuta la consulta
            rs = ps.executeQuery();

            if (rs.next()) {
                cli = new Clientes(rs.getInt(1),
                        rs.getString(2),
                        rs.getString(3),
                        rs.getString(4)
                );
            }
            rs.close();
            ps.close();
        } catch (Exception e) {
            throw e;
        } finally {
            cn.close();
        }
        return cli;
    }

    @Override
    public List<Clientes> listar() throws Exception {
        List<Clientes> lista = new ArrayList<>();
        String sql = "SELECT * FROM clientes;";
        try {
            cn = Conexion.getConnection();
            ps = cn.prepareStatement(sql);
            rs = ps.executeQuery();

            while (rs.next()) {
                cli = new Clientes(rs.getInt(1),
                        rs.getString(2),
                        rs.getString(3),
                        rs.getString(4)
                );
                lista.add(cli);
            }
        } catch (Exception e) {
            throw e;
        } finally {
            cn.close();
        }
        return lista;
    }

}
