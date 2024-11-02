using Microsoft.AspNetCore.Mvc;
using Newtonsoft.Json;
using ProductosCliente.Models;
using System.Text;
using System.Text.Json.Serialization;

namespace ProductosCliente.Controllers
{
    public class ProductoController : Controller
    {
        private readonly HttpClient _httpClient;
        public ProductoController(IHttpClientFactory httpClientFactory)
        {
            _httpClient = httpClientFactory.CreateClient();
            _httpClient.BaseAddress = new Uri("https://localhost:7100/api");
        }
      

        public async Task<IActionResult> Index()
        {
            var response = await _httpClient.GetAsync("/api/Productos/lista");

            if (response.IsSuccessStatusCode)
            {
                var content = await response.Content.ReadAsStringAsync();
                var productos = JsonConvert.DeserializeObject<IEnumerable<ProductoViewModel>>(content);
                return View("Index", productos);
            }

            // Manejar el caso en que la solicitud HTTP no fue exitosa.
            return View(new List<ProductoViewModel>()); // Puedes mostrar una vista vacía o un mensaje de error.
        }

        public async Task<IActionResult> Details(int id)
        {

            var response = await _httpClient.GetAsync($"/api/Productos/ver?id={id}");


            if (response.IsSuccessStatusCode)
            {
                var content = await response.Content.ReadAsStringAsync();
                var producto = JsonConvert.DeserializeObject<ProductoViewModel>(content);

                // Devuelve la vista de edición con los detalles del producto.
                return View(producto);
            }
            else
            {
                // Manejar el caso de error al obtener los detalles del producto.
                return RedirectToAction("Details"); // Redirige a la página de lista de productos u otra acción apropiada.
            }
        }

        public IActionResult Create()
        {
            return View();
        }

        [HttpPost]
        public async Task<IActionResult> Create(ProductoViewModel producto)
        {
            if (ModelState.IsValid)
            {
                var json = JsonConvert.SerializeObject(producto);
                var content = new StringContent(json, Encoding.UTF8, "application/json");

                var response = await _httpClient.PostAsync("/api/Productos/crear", content);

                if (response.IsSuccessStatusCode)
                {
                    // Manejar el caso de creación exitosa.
                    return RedirectToAction("Index");
                }
                else
                {
                    // Manejar el caso de error en la solicitud POST, por ejemplo, mostrando un mensaje de error.
                    ModelState.AddModelError(string.Empty, "Error al crear el producto.");
                }
            }
            return View(producto);
        }

        public async Task<IActionResult> Edit(int id)
        {

            var response = await _httpClient.GetAsync($"/api/Productos/ver?id={id}");

            if (response.IsSuccessStatusCode)
            {
                var content = await response.Content.ReadAsStringAsync();
                var producto = JsonConvert.DeserializeObject<ProductoViewModel>(content);

                // Devuelve la vista de edición con los detalles del producto.
                return View(producto);
            }
            else
            {
                // Manejar el caso de error al obtener los detalles del producto.
                return RedirectToAction("Details"); // Redirige a la página de lista de productos u otra acción apropiada.
            }
        }

        [HttpPost]
        public async Task<IActionResult> Edit(int id, ProductoViewModel producto)
        {
            if (ModelState.IsValid)
            {


                var json = JsonConvert.SerializeObject(producto);
                var content = new StringContent(json, Encoding.UTF8, "application/json");

                var response = await _httpClient.PutAsync($"/api/Productos/editar?id={id}", content);

                if (response.IsSuccessStatusCode)
                {
                    // Manejar el caso de actualización exitosa, por ejemplo, redirigiendo a la página de detalles del producto.
                    return RedirectToAction("Index", new { id });
                }
                else
                {
                    // Manejar el caso de error en la solicitud PUT o POST, por ejemplo, mostrando un mensaje de error.
                    ModelState.AddModelError(string.Empty, "Error al actualizar el producto.");
                }
            }

            // Si hay errores de validación, vuelve a mostrar el formulario de edición con los errores.
            return View(producto);
        }

        public async Task<IActionResult> Delete(int id)
        {
            var response = await _httpClient.DeleteAsync($"/api/Productos/eliminar?id={id}");

            if (response.IsSuccessStatusCode)
            {
                // Maneja el caso de eliminación exitosa, por ejemplo, redirigiendo a la página de lista de productos.
                return RedirectToAction("Index");
            }
            else
            {
                // Maneja el caso de error en la solicitud DELETE, por ejemplo, mostrando un mensaje de error.
                TempData["Error"] = "Error al eliminar el producto.";
                return RedirectToAction("Index");
            }
        }
    }
}
