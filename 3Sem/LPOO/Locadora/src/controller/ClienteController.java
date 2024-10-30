package controller;

import model.Cliente;

public class ClienteController {
    public static void main(String[] args) {
        Cliente c1 = new Cliente();
        Cliente c2 = new Cliente();

        Cliente c3 = new Cliente("5555.555.555.55", "Alexandre", "Lorencato", "IfSul", "96030-000", "53 999453267", "email@gmail.com");
        Cliente c4 = new Cliente("4444.333.222.11", "Paulo", "Garcia", "Fragata", "96030-555", "53 958325475", "paulo@gmail.com");

        Cliente c5= new Cliente("Leticia","Araujo","leticia@gmail.com");
        Cliente c6= new Cliente("Mathias","Da Silva","mathias@gmail.com");

        System.out.println(c1);
        System.out.println(c2);
        System.out.println(c3);
        System.out.println(c4);
        System.out.println(c5);
        System.out.println(c6);

        c1.setCep("00000-11");
        c1.setCpf("088-352-132-10");
        c1.setNome("Rojerio");
        c1.setEmail("RojerioPaulo@hotmail.com");
        c1.setEndereco("Casa Do Rojerio 1000000");
        c1.setSobrenome("Paulo");
        c1.setTelefone("999999432");

        c2.setCep("00000-11");
        c2.setCpf("088-352-132-10");
        c2.setNome("Rojerio");
        c2.setEmail("RojerioPaulo@hotmail.com");
        c2.setEndereco("Casa Do Rojerio 1000000");
        c2.setSobrenome("Paulo");
        c2.setTelefone("999999432");

        System.out.println(c1.getCpf());
        System.out.println(c1.getNome());
        System.out.println(c1.getSobrenome());
        System.out.println(c1.getEndereco());
        System.out.println(c1.getCep());
        System.out.println(c1.getEmail());
        System.out.println(c1.getTelefone());
        System.out.println(c2.getCpf());
        System.out.println(c2.getNome());
        System.out.println(c2.getSobrenome());
        System.out.println(c2.getEndereco());
        System.out.println(c2.getCep());
        System.out.println(c2.getEmail());
        System.out.println(c2.getTelefone());

    }
}
