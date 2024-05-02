import csv


def encontrar_duplicados_en_csv(archivo_csv):
    valores = set()
    duplicados = set()

    with open(archivo_csv, 'r', newline='') as file:
        reader = csv.reader(file)
        next(reader)  # Saltar la primera fila si contiene encabezados
        for row in reader:
            dni = row[0]  # El índice 0 representa la primera columna
            if dni in valores:
                duplicados.add(dni)
            else:
                valores.add(dni)

    return list(duplicados)


# Ejemplo de uso
archivo_csv = 'dni.csv'  # Cambia por la ruta de tu archivo CSV

valores_duplicados = encontrar_duplicados_en_csv(archivo_csv)
print("Valores duplicados en la columna 'dni':", valores_duplicados)
