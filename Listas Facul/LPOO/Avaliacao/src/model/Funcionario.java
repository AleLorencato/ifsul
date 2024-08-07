package model;

public abstract class Funcionario implements Socio{
	protected String nome;
	protected String sobrenome;
	protected double salario;

	public Funcionario(String nome, String sobrenome, double salario) {
		this.nome = nome;
		this.sobrenome = sobrenome;
		this.salario = salario;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getSobrenome() {
		return sobrenome;
	}

	public void setSobrenome(String sobrenome) {
		this.sobrenome = sobrenome;
	}

	public double getSalario() {
		return salario;
	}

	public void setSalario(double salario) {
		this.salario = salario;
	}

	@Override
	public String toString() {
		return "Funcionario{" +
				"nome='" + nome + '\'' +
				", sobrenome='" + sobrenome + '\'' +
				", salario=" + salario +
				'}';
	}
}
