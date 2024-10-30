package controller;

import model.Carro;
import model.Funcionario;

import java.awt.*;
import java.util.*;
import java.util.List;

public class FuncionarioController {
    public static void main(String[] args) {

        Funcionario f1 = new Funcionario();
        Funcionario f2 = new Funcionario();

        Funcionario f3 = new Funcionario(1,"Maria",3000 );

        Funcionario f4 = new Funcionario(2,"Joao",20000);

        Funcionario f5 = new Funcionario(3,"Pedro");
        Funcionario f6 = new Funcionario(4,"Gabriel");


        System.out.println(f1);
        System.out.println(f2);
        System.out.println(f3);
        System.out.println(f4);
        System.out.println(f5);
        System.out.println(f6);

        f1.setId(1);
        f1.setNome("Jacob");
        f1.setSalario(10000);
        f2.setId(2);
        f2.setNome("Maria");
        f2.setSalario(2000);
        f3.setId(3);
        f3.setNome("Alexandre");
        f3.setSalario(800);
        f4.setId(4);
        f4.setNome("Cicero");
        f4.setSalario(3500);
        f5.setId(5);
        f5.setNome("Andre");
        f5.setSalario(8000);
        f6.setId(6);
        f6.setNome("Olivia");
        f6.setSalario(5000);

        System.out.println(f1.getId());
        System.out.println(f1.getNome());
        System.out.println(f1.getSalario());

        System.out.println(f2.getId());
        System.out.println(f2.getNome());
        System.out.println(f2.getSalario());

        System.out.println(f3.getId());
        System.out.println(f3.getNome());
        System.out.println(f3.getSalario());

        System.out.println(f4.getId());
        System.out.println(f4.getNome());
        System.out.println(f4.getSalario());

        System.out.println(f5.getId());
        System.out.println(f5.getNome());
        System.out.println(f5.getSalario());

        System.out.println(f6.getId());
        System.out.println(f6.getNome());
        System.out.println(f6.getSalario());


        List<Funcionario> funcionarioList = new ArrayList<>();

        funcionarioList.add(f1);
        funcionarioList.add(f2);
        funcionarioList.add(f3);
        System.out.println("\nColeção do tipo List\n" + funcionarioList);

        funcionarioList.sort(Comparator.comparing(Funcionario::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(funcionarioList);

        Map<Integer,Funcionario> funcionarioMap = new HashMap<>();
        funcionarioMap.put(f1.getId(),f1);
        funcionarioMap.put(f2.getId(),f2);
        funcionarioMap.put(f3.getId(),f3);

        for(Funcionario funcionario : funcionarioList){
            if(funcionario.getId()== 3){
                System.out.print("\nFuncionario com id = 3 ");
                System.out.print(funcionario);
            }
        }

        funcionarioList.sort(Comparator.comparing(Funcionario::getId));
        Funcionario funcionarioFind = funcionarioList.get(
                Collections.binarySearch(
                        funcionarioList,
                        f3,
                        Comparator.comparing(Funcionario::getId)
                )
        );

        System.out.println("Funcionario binary search");
        System.out.println(funcionarioFind);



    }
}
