package model;

public abstract class Veiculo {
	protected int numeroDeEixos;
	protected String propulsao;
	protected String modelo;
	protected String marca;
	protected int anoFabricacao;

	public Veiculo() {
	}

	public Veiculo(int numeroDeEixos, String propulsao, String modelo, String marca, int anoFabricacao) {
		this.numeroDeEixos = numeroDeEixos;
		this.propulsao = propulsao;
		this.modelo = modelo;
		this.marca = marca;
		this.anoFabricacao = anoFabricacao;
	}

	public int getNumeroDeEixos() {
		return numeroDeEixos;
	}

	public void setNumeroDeEixos(int numeroDeEixos) {
		this.numeroDeEixos = numeroDeEixos;
	}

	public String getPropulsao() {
		return propulsao;
	}

	public void setPropulsao(String propulsao) {
		this.propulsao = propulsao;
	}

	public String getModelo() {
		return modelo;
	}

	public void setModelo(String modelo) {
		this.modelo = modelo;
	}

	public String getMarca() {
		return marca;
	}

	public void setMarca(String marca) {
		this.marca = marca;
	}

	public int getAnoFabricacao() {
		return anoFabricacao;
	}

	public void setAnoFabricacao(int anoFabricacao) {
		this.anoFabricacao = anoFabricacao;
	}

	@Override
	public String toString() {
		return "Veiculo{" +
				"numeroDeEixos=" + numeroDeEixos +
				", propulsao='" + propulsao + '\'' +
				", modelo='" + modelo + '\'' +
				", marca='" + marca + '\'' +
				", anoFabricacao=" + anoFabricacao +
				'}';
	}
}