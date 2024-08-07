package controller;

import model.*;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

public class BolsaController {

	public static void main(String[] args) {

		System.out.println("Questão b\n");

		ClientePessoaFisica cpf1 = new ClientePessoaFisica("Alfredo","Dias","alfredo@gmail.com","123456789");

		ClientePessoaFisica cpf2 = new ClientePessoaFisica("Joao","DoGrau","joaozindograu@gmail.com","8743314693");

		ClientePessoaJuridica cpj1 = new ClientePessoaJuridica("Adalberto","","adalberto@gmail.com","784561284");
		ClientePessoaJuridica cpj2 = new ClientePessoaJuridica("Pedro","","pedropaulo@gmail.com","846515643");

		Vendedor v1 = new Vendedor("Romeu","Abreu",3000,0.05);
		Vendedor v2 = new Vendedor("Jose","Dirceu",3000,0.05);

		Gerente g1 = new Gerente("Lula","Da silva",12000,0.02);
		Gerente g2 = new Gerente("Jair","Bolsonaro",12000,0.02);

		System.out.println(cpf1);
		System.out.println(cpf2);
		System.out.println(cpj1);
		System.out.println(cpj2);

		System.out.println(v1);
		System.out.println(v2);

		System.out.println(g1);
		System.out.println(g2);

		System.out.println("\nQuestão d");

		List<Cliente> clientes = new ArrayList<>();

		clientes.add(cpf1);
		clientes.add(cpf2);
		clientes.add(cpj1);
		clientes.add(cpj2);

		System.out.println("\nLista de Clientes:" + clientes);

		List<Funcionario> funcionarios = new ArrayList<>();
		funcionarios.add(g1);
		funcionarios.add(g2);
		funcionarios.add(v1);
		funcionarios.add(v2);

		System.out.println("\nLista de Funcionarios:" + funcionarios);

		System.out.println("\nQuestão f");

		double folhaSalarial = 0.0;
		for ( Funcionario funcionario : funcionarios) {
			folhaSalarial = folhaSalarial + funcionario.getSalario();
		}
		System.out.println(folhaSalarial);


		System.out.println("\nQuestão g");

		double custo = 0.0;

		custo = custo + v1.getSalario() + (500000 * v1.getTaxaDeComissao());
		custo = custo + v2.getSalario() + (500000 * v2.getTaxaDeComissao());
		System.out.println("\nCusto dos Vendedores: "+ custo);
		custo = 0.0;
		custo = custo + g1.getSalario() + (1000000 * g2.getTaxaDeBonificacao());
		custo = custo + g2.getSalario() + (1000000 * g2.getTaxaDeBonificacao());
		System.out.println("\nCusto dos Gerentes: "+ custo);

		System.out.println("\n Questão h");

			cpf1.setQuantidadeDeAcoes(100);
			cpf2.setQuantidadeDeAcoes(30);
			cpj1.setQuantidadeDeAcoes(10);
			cpj2.setQuantidadeDeAcoes(1000);

			v1.setQuantidadeDeAcoes(845);
			v2.setQuantidadeDeAcoes(25);
			g1.setQuantidadeDeAcoes(150);
			g2.setQuantidadeDeAcoes(300);

		clientes.sort(Comparator.comparing(Cliente::getQuantidadeDeAcoes));
		System.out.println(clientes);

		System.out.println("\n Questão i");

		clientes.sort(Comparator.comparing(Cliente::getNome));
		System.out.println(clientes);

		System.out.println("\n Questão j");

		double valorDeMercado = 0.0;

		for (Cliente cliente : clientes) {
			valorDeMercado = valorDeMercado + (cliente.getQuantidadeDeAcoes() * 10);
		}
		for (Funcionario funcionario : funcionarios) {
			valorDeMercado = valorDeMercado + (funcionario.getQuantidadeDeAcoes() * 10);
		}
		System.out.println("Valor De Mercado da Empresa:" + valorDeMercado);

		double MaisAcoes = 0.0;

		System.out.println("\n Questão k");

		for (Funcionario funcionario : funcionarios) {
			if (funcionario.getQuantidadeDeAcoes() > MaisAcoes) {
				MaisAcoes = funcionario.getQuantidadeDeAcoes();
			}
		}
		for (Funcionario funcionario : funcionarios) {
		if (funcionario.getQuantidadeDeAcoes() == MaisAcoes) {
		System.out.println("Funcionário com mais ações da empresa:" + funcionario);
	}

}
		MaisAcoes = 0.0;

		for ( Cliente cliente : clientes) {
			if (cliente.getQuantidadeDeAcoes() > MaisAcoes) {
				MaisAcoes = cliente.getQuantidadeDeAcoes();
			}
		}

		for ( Cliente cliente : clientes) {
			if (cliente.getQuantidadeDeAcoes() == MaisAcoes) {
				System.out.println("Cliente com mais ações da empresa:" + cliente);
			} }
	}
}
