package model.empresa;

import java.util.ArrayList;
import java.util.List;

public class Empresa {
	private String cnpj;
	private String razaoSocial;
	private String nomeFantasia;

	private List<Funcionario> funcionarios = new ArrayList<Funcionario>();
}
