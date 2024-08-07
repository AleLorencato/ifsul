package Model;

public class Peixe extends Animal{
	private double z;
	public Peixe() {
	}

	public Peixe(double x, double y) {
		super(x, y);
	}


	public void mover(double x, double y, double z) {
		mover(x, y, z);
	}

	@Override
	public void desenhar() {
		System.out.println("\n Desenhou um Peixe");
	}
}
