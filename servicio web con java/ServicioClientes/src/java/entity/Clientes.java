package entity;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

//Generar constructor vacio
@NoArgsConstructor
//Generar constructor con parametros
@AllArgsConstructor
//Generar getter and setter
@Data

public class Clientes {

    //atributos
    public int codigo;
    public String nombre;
    public String dni;
    public String telefono;
}
