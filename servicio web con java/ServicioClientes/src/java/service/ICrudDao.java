package service;

import java.util.List;

public interface ICrudDao<T> {

    //definir las firmas
    int registrar(T t) throws Exception;

    int actualizar(T t) throws Exception;

    int eliminar(T t) throws Exception;

    List<T> listar() throws Exception;

    T buscar(int t) throws Exception;
}
