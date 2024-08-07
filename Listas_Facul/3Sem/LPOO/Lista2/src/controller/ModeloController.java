package controller;


import model.Modelo;

import java.util.*;

public class ModeloController {
    public static void main(String[] args) {
        Modelo m1 = new Modelo();
        Modelo m2 = new Modelo();

        Modelo m3 = new Modelo(3,"Edge");
        Modelo m4 = new Modelo(4,"C 180");

        Modelo m5 = new Modelo(5,"Argo");
        Modelo m6 = new Modelo(6,"Gol");


        System.out.println(m1);
        System.out.println(m2);
        System.out.println(m3);
        System.out.println(m4);
        System.out.println(m5);
        System.out.println(m6);

        m1.setId(1);
        m1.setDescricao("320i");
        m2.setId(2);
        m2.setDescricao("Mobi");
        m3.setId(3);
        m3.setDescricao("Agile");
        m4.setId(4);
        m4.setDescricao("A3");
        m5.setId(5);
        m5.setDescricao("Chiro");
        m6.setId(6);
        m6.setDescricao("Dolphin");

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

        List<Modelo> modeloList = new ArrayList<>();
        modeloList.add(m1);
        modeloList.add(m2);
        modeloList.add(m3);
        System.out.println("\nColeção do tipo List\n" + modeloList);

        modeloList.sort(Comparator.comparing(Modelo::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(modeloList);

        Map<Integer, Modelo> modeloMap = new HashMap<>();
        modeloMap.put(m1.getId(), m1);
        modeloMap.put(m2.getId(), m2);
        modeloMap.put(m3.getId(), m3);

        for (Modelo modelo : modeloList) {
            if (modelo.getId() == 3) {
                System.out.print("\nModelo com id = 3 ");
                System.out.print(modelo);
            }
        }

        modeloList.sort(Comparator.comparing(Modelo::getId));
        Modelo modeloFind = modeloList.get(
                Collections.binarySearch(
                        modeloList,
                        m3,
                        Comparator.comparing(Modelo::getId)
                )
        );

        System.out.println("\nModelo binary search");
        System.out.println(modeloFind);




    }



}
