package controller;

import model.Carro;

import java.util.*;

public class CarroController {
    public static void main(String[] args) {

        Carro c1 = new Carro();
        Carro c2 = new Carro();

        Carro c3 = new Carro(1,"Volkswagen","Fox", 2024);
        Carro c4 = new Carro(2,"Mercedes","G63 AMG", 2012);

        Carro c5 = new Carro("Mercedes","C180");
        Carro c6 = new Carro("Mercedes","G63 AMG");

        System.out.println(c1);
        System.out.println(c2);
        System.out.println(c3);
        System.out.println(c4);
        System.out.println(c5);
        System.out.println(c6);

        c1.setId(1);
        c1.setMarca("Fiat");
        c1.setModelo("Uno");
        c1.setAnoFabricacao(2001);

        c2.setId(2);
        c2.setMarca("Vw");
        c2.setModelo("Gol");
        c2.setAnoFabricacao(2004);

        c3.setId(3);
        c3.setMarca("Nissan");
        c3.setModelo("Sentra");
        c3.setAnoFabricacao(2014);

        c4.setId(4);
        c4.setMarca("Toyota");
        c4.setModelo("Hilux");
        c4.setAnoFabricacao(2006);

        System.out.println(c1.getId());
        System.out.println(c1.getMarca());
        System.out.println(c1.getModelo());
        System.out.println(c1.getAnoFabricacao());

        System.out.println(c2.getId());
        System.out.println(c2.getMarca());
        System.out.println(c2.getModelo());
        System.out.println(c2.getAnoFabricacao());

        System.out.println(c3.getId());
        System.out.println(c3.getMarca());
        System.out.println(c3.getModelo());
        System.out.println(c3.getAnoFabricacao());

        System.out.println(c4.getId());
        System.out.println(c4.getMarca());
        System.out.println(c4.getModelo());
        System.out.println(c4.getAnoFabricacao());


        List<Carro> carroList = new ArrayList<>();

        carroList.add(c1);
        carroList.add(c2);
        carroList.add(c3);
        carroList.add(c4);
        System.out.println("\nColeção do tipo List\n" + carroList);

        carroList.sort(Comparator.comparing(Carro::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(carroList);

        Map<Integer,Carro> carroMap = new HashMap<>();
        carroMap.put(c1.getId(),c1);
        carroMap.put(c2.getId(),c2);
        carroMap.put(c3.getId(),c3);
        System.out.println("\nColeção do tipo Map\n" + carroMap);

        for(Carro carro : carroList){
            if(carro.getId() == 3){
                System.out.print("\nCarro com id = 3 ");
                System.out.print(carro);
            }
        }


        carroList.sort(Comparator.comparing(Carro::getId));
        Carro carroFind = carroList.get(
                Collections.binarySearch(
                        carroList,
                        c3,
                        Comparator.comparing(Carro::getId)
                )
        );

        System.out.println("Carro binary search");
        System.out.println(carroFind);

    }
}
