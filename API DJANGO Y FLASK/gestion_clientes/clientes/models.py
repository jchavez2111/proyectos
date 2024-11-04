from django.db import models

class Cliente(models.Model):
    nombre = models.CharField(max_length=100, null=True, blank=True)
    dni = models.CharField(max_length=20, null=True, blank=True)
    telefono = models.CharField(max_length=20, null=True, blank=True)

    def __str__(self):
        return self.nombre
