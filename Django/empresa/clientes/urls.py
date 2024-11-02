from django.urls import path
from .views import listar,registrar,actualizar,eliminar

urlpatterns = [
    path('', listar, name='listar'),
    path('create/', registrar, name='registrar'),
    path('update/<int:pk>/', actualizar, name='actualizar'),
    path('delete/<int:pk>/', eliminar, name='eliminar'),
]
