package controller;


import model.Modelo;

public class ModeloController {
    public static void main(String[] args) {
        Modelo m1 = new Modelo();
        Modelo m2 = new Modelo();

        Modelo m3 = new Modelo("Edge");
        Modelo m4 = new Modelo("C 180");

        Modelo m5 = new Modelo("Argo");
        Modelo m6 = new Modelo("Gol");


        System.out.println(m1);
        System.out.println(m2);
        System.out.println(m3);
        System.out.println(m4);
        System.out.println(m5);
        System.out.println(m6);

        m1.setDescricao("320i");
        m2.setDescricao("Mobi");
        m3.setDescricao("Agile");
        m4.setDescricao("A3");
        m5.setDescricao("Chiro");
        m6.setDescricao("Dolphin");

        System.out.println(m1.getDescricao());
        System.out.println(m2.getDescricao());
        System.out.println(m3.getDescricao());
        System.out.println(m4.getDescricao());
        System.out.println(m5.getDescricao());
        System.out.println(m6.getDescricao());
    }



}
