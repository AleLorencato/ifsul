package controller;

import model.Cliente;

import java.util.*;

public class ClienteController {
    public static void main(String[] args) {
        Cliente c1 = new Cliente();
        Cliente c2 = new Cliente();

        Cliente c3 = new Cliente(3,"5555.555.555.55", "Alexandre", "Lorencato", "IfSul", "96030-000", "53 999453267", "email@gmail.com");
        Cliente c4 = new Cliente(4,"4444.333.222.11", "Paulo", "Garcia", "Fragata", "96030-555", "53 958325475", "paulo@gmail.com");

        Cliente c5= new Cliente("Leticia","Araujo","leticia@gmail.com");
        Cliente c6= new Cliente("Mathias","Da Silva","mathias@gmail.com");

        System.out.println(c1);
        System.out.println(c2);
        System.out.println(c3);
        System.out.println(c4);
        System.out.println(c5);
        System.out.println(c6);

        c1.setId(1);
        c1.setCep("00000-11");
        c1.setCpf("088-352-132-10");
        c1.setNome("Rojerio");
        c1.setEmail("RojerioPaulo@hotmail.com");
        c1.setEndereco("Casa Do Rojerio 1000000");
        c1.setSobrenome("Paulo");
        c1.setTelefone("999999432");

        c2.setId(2);
        c2.setCep("00000-11");
        c2.setCpf("088-352-132-10");
        c2.setNome("Rojerio");
        c2.setEmail("RojerioPaulo@hotmail.com");
        c2.setEndereco("Casa Do Rojerio 1000000");
        c2.setSobrenome("Paulo");
        c2.setTelefone("999999432");

        System.out.println(c1.getId());
        System.out.println(c1.getCpf());
        System.out.println(c1.getNome());
        System.out.println(c1.getSobrenome());
        System.out.println(c1.getEndereco());
        System.out.println(c1.getCep());
        System.out.println(c1.getEmail());
        System.out.println(c1.getTelefone());
        System.out.println(c2.getId());
        System.out.println(c2.getCpf());
        System.out.println(c2.getNome());
        System.out.println(c2.getSobrenome());
        System.out.println(c2.getEndereco());
        System.out.println(c2.getCep());
        System.out.println(c2.getEmail());
        System.out.println(c2.getTelefone());

        List<Cliente> clienteList = new ArrayList<>();
        clienteList.add(c1);
        clienteList.add(c2);
        clienteList.add(c3);
        System.out.println("\nColeção do tipo List\n" + clienteList);

        clienteList.sort(Comparator.comparing(Cliente::getId).reversed());
        System.out.println("\nColeção em ordem decrescente");
        System.out.println(clienteList);

        Map<Integer, Cliente> clienteMap = new HashMap<>();
        clienteMap.put(c1.getId(), c1);
        clienteMap.put(c2.getId(), c2);
        clienteMap.put(c3.getId(), c3);

        for (Cliente cliente : clienteList) {
            if (cliente.getId() == 3) {
                System.out.print("\nCliente com id = 3 ");
                System.out.print(cliente);
            }
        }

        clienteList.sort(Comparator.comparing(Cliente::getId));
        Cliente clienteFind = clienteList.get(
                Collections.binarySearch(
                        clienteList,
                        c3,
                        Comparator.comparing(Cliente::getId)
                )
        );

        System.out.println("\nCliente binary search");
        System.out.println(clienteFind);
    }
}
