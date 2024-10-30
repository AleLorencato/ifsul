package controller;

import model.Marca;

public class MarcaController {
    public static void main(String[] args) {
        Marca m1 = new Marca();
        Marca m2 = new Marca();

        Marca m3 = new Marca("Ford");
        Marca m4 = new Marca("Mercedes");

        Marca m5 = new Marca("Maserati");
        Marca m6 = new Marca("Porsche");

        System.out.println(m1);
        System.out.println(m2);
        System.out.println(m3);
        System.out.println(m4);
        System.out.println(m5);
        System.out.println(m6);

        m1.setDescricao("BMW");
        m2.setDescricao("Fiat");
        m3.setDescricao("Chevrolet");
        m4.setDescricao("Audi");
        m5.setDescricao("Bugatti");
        m6.setDescricao("BYD");

        System.out.println(m1.getDescricao());
        System.out.println(m2.getDescricao());
        System.out.println(m3.getDescricao());
        System.out.println(m4.getDescricao());
        System.out.println(m5.getDescricao());
        System.out.println(m6.getDescricao());


    }


}
