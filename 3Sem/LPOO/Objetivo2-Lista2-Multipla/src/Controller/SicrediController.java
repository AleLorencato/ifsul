package Controller;

import Model.Cliente;
import Model.Desenvolvedor;
import Model.Funcionario;
import Model.Gerente;

import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;

public class SicrediController {

    public static void main(String[] args) {

        Gerente g1 = new Gerente();
        Cliente c1 = new Cliente();

        List<Funcionario> funcionarioList = new ArrayList<>();
//        List<Desenvolvedor> desenvolvedorList = new ArrayList<>();
//        List<Gerente> gerenteList = new ArrayList<>();
//        List<Cliente> clienteList = new ArrayList<>();5
g1.setNome("Eduardo");
            g1.setSalario(10000);
            g1.setTicker("MGLU3");
            g1.setQuantidade(10);
        Desenvolvedor d1 = new Desenvolvedor();
        Desenvolvedor d2 = new Desenvolvedor();
        Desenvolvedor d3 = new Desenvolvedor();
        Desenvolvedor d4 = new Desenvolvedor();
        Desenvolvedor d5 = new Desenvolvedor();
        Desenvolvedor d6 = new Desenvolvedor();

        d1.setNome("Alberto");
        d1.setSalario(3200);

        d2.setNome("Rojerio");
        d2.setSalario(4000);

        d3.setNome("Alexandre");
        d3.setSalario(4200);

        d4.setNome("Alfred");
        d4.setSalario(3300);

        d5.setNome("Cristian");
        d5.setSalario(1800);

        d6.setNome("Maria");
        d6.setSalario(3750);

        funcionarioList.add(d1);
        funcionarioList.add(d2);
        funcionarioList.add(d3);
        funcionarioList.add(d4);
        funcionarioList.add(d5);
        funcionarioList.add(d6);

        System.out.println(g1.getNome());
        System.out.println(g1.getSalario() + g1.getBonus());
        System.out.println(g1.getTicker());
        System.out.println(g1.getQuantidade());





        funcionarioList.sort(Comparator.comparing(Funcionario::getSalario).reversed());
        for (Funcionario funcionario : funcionarioList) {
            System.out.println("Nome: " + funcionario.getNome());
            System.out.println("Salário: " + funcionario.getSalario());
            System.out.println("------------------");
        }

    }

}
