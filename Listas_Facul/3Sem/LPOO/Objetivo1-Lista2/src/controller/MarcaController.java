package controller;

import model.Marca;

import java.util.*;

public class MarcaController {
    public static void main(String[] args) {
        Marca m1 = new Marca();
        Marca m2 = new Marca();

        Marca m3 = new Marca(3,"Ford");
        Marca m4 = new Marca(4,"Mercedes");

        Marca m5 = new Marca(5,"Maserati");
        Marca m6 = new Marca(6,"Porsche");

        System.out.println(m1);
        System.out.println(m2);
        System.out.println(m3);
        System.out.println(m4);
        System.out.println(m5);
        System.out.println(m6);

        m1.setId(1);
        m1.setDescricao("BMW");
        m2.setId(2);
        m2.setDescricao("Fiat");
        m3.setId(3);
        m3.setDescricao("Chevrolet");
        m4.setId(4);
        m4.setDescricao("Audi");
        m5.setId(5);
        m5.setDescricao("Bugatti");
        m6.setId(6);
        m6.setDescricao("BYD");

        System.out.println(m1.getId());
        System.out.println(m1.getDescricao());
        System.out.println(m2.getId());
        System.out.println(m2.getDescricao());
        System.out.println(m3.getId());
        System.out.println(m3.getDescricao());
        System.out.println(m4.getId());
        System.out.println(m4.getDescricao());
        System.out.println(m5.getId());
        System.out.println(m5.getDescricao());
        System.out.println(m6.getId());
        System.out.println(m6.getDescricao());

        List<Marca> marcaList = new ArrayList<>();
        marcaList.add(m1);
        marcaList.add(m2);
        marcaList.add(m3);
        System.out.println("\nColeção do tipo List\n" + marcaList);

        marcaList.sort(Comparator.comparing(Marca::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(marcaList);

        Map<Integer, Marca> marcaMap = new HashMap<>();
        marcaMap.put(m1.getId(), m1);
        marcaMap.put(m2.getId(), m2);
        marcaMap.put(m3.getId(), m3);

        for (Marca marca : marcaList) {
            if (marca.getId() == 3) {
                System.out.print("\nMarca com id = 3 ");
                System.out.print(marca);
            }
        }

        marcaList.sort(Comparator.comparing(Marca::getId));
        Marca marcaFind = marcaList.get(
                Collections.binarySearch(
                        marcaList,
                        m3,
                        Comparator.comparing(Marca::getId)
                )
        );

        System.out.println("\nMarca binary search");
        System.out.println(marcaFind);
    }
}