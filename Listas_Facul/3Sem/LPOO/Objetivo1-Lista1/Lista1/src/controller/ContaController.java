package controller;

import model.Carro;
import model.Conta;

import java.util.*;

public class ContaController {

    public static void main(String[] args) {

        Conta c1 = new Conta();
        Conta c2 = new Conta();

        Conta c3 = new Conta(3,5000);
        Conta c4 = new Conta(3,3300.08);

        Conta c5 = new Conta(2);
        Conta c6 = new Conta(2);

        System.out.println(c1);
        System.out.println(c2);
        System.out.println(c3);
        System.out.println(c4);
        System.out.println(c5);
        System.out.println(c6);

        c1.setId(1);
        c1.deposita(2000.00);
        c2.setId(2);
        c2.deposita(4000.00);

        c3.setId(3);
        c3.deposita(5000.00);
        c4.setId(4);
        c4.deposita(8000.00);

        c5.setId(6);
        c5.deposita(10000.00);
        c6.setId(6);
        c6.deposita(12000.00);

        System.out.println(c1.getId());
        System.out.println(c1.getSaldo());
        System.out.println(c2.getId());
        System.out.println(c2.getSaldo());

        System.out.println(c3.getId());
        System.out.println(c3.getSaldo());
        System.out.println(c4.getId());
        System.out.println(c4.getSaldo());

        System.out.println(c5.getId());
        System.out.println(c5.getSaldo());
        System.out.println(c6.getId());
        System.out.println(c6.getSaldo());

        List<Conta> contaList = new ArrayList<>();
        contaList.add(c1);
        contaList.add(c2);
        contaList.add(c3);
        contaList.add(c4);
        System.out.println("\nColeção do tipo List\n" + contaList);

        contaList.sort(Comparator.comparing(Conta::getId).reversed());
        System.out.println("\nColeção em ordem decrescente\n");
        System.out.println(contaList);

        Map<Integer,Conta> contaMap = new HashMap<>();
        contaMap.put(c1.getId(),c1);
        contaMap.put(c2.getId(),c2);
        contaMap.put(c3.getId(),c3);
        System.out.println("\nColeção do tipo Map\n" + contaMap);

        for(Conta conta : contaList){
            if(conta.getId() == 3){
                System.out.print("\nConta com id = 3 \n");
                System.out.print(conta);
            }
        }

        contaList.sort(Comparator.comparing(Conta::getId));
        Conta contaFind = contaList.get(
                Collections.binarySearch(
                        contaList,
                        c3,
                        Comparator.comparing(Conta::getId)
                )
        );
        System.out.println("Carro binary search");
        System.out.println(contaFind);



    }

}
