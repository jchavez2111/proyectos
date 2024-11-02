from django.db import models


# Create your models here.
class Cliente(models.Model):
    nombre = models.CharField(max_length=100)
    numruc = models.CharField(max_length=11)
    direccion = models.CharField(max_length=100)
    telefono = models.CharField(max_length=20)

    class Meta:
        db_table = "cliente"
