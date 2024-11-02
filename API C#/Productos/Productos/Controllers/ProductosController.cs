using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using Productos.Models;

namespace Productos.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ProductosController : ControllerBase
    {
        private readonly ProductosContext _context;
        public ProductosController(ProductosContext context)
        { 
            _context = context;
        }

        [HttpPost]
        [Route("crear")]
        public async Task<IActionResult> CrearProducto(Producto producto)
        {
            //guardar el producto en la base de datos
            await _context.Productos.AddAsync(producto);
            await _context.SaveChangesAsync();

            //devolver un mensaje de exito
            return Ok();
        }

        [HttpGet]
        [Route("lista")]
        public async Task<ActionResult<IEnumerable<Producto>>> ListaProducto()
        {
            //Obten la lista de productos de la base de datos
            var productos = await _context.Productos.ToListAsync();

            //devuelve una lista de productos
            return Ok(productos);
        }

        [HttpGet]
        [Route("ver")]
        public async Task<IActionResult> VerProducto(int id)
        {
            //obtener el producto de la base de datos
            Producto producto = await _context.Productos.FindAsync(id);

            //devolver el producto
            if (producto == null) { return NotFound(); }
            return Ok(producto);
        }

        [HttpPut]
        [Route("editar")]
        public async Task<IActionResult> ActualizarProducto(int id, Producto producto)
        {
            //Actualizar el producto en la base de datos
            var productoExistente = await _context.Productos.FindAsync(id);
            productoExistente!.Nombre = producto.Nombre;
            productoExistente.Descripcion = producto.Descripcion;
            productoExistente.Precio = producto.Precio;

            await _context.SaveChangesAsync();

            //devolver un mensaje de exito
            return Ok();
        }

        [HttpDelete]
        [Route("eliminar")]
        public async Task<IActionResult> EliminarProducto(int id)
        {
            //Eliminar producto de la base de datos
            var productoBorrado = await _context.Productos.FindAsync(id);
            _context.Productos.Remove(productoBorrado!);

            await _context.SaveChangesAsync();

            //Devolver un mensaje de exito
            return Ok();
        }


    }
}
