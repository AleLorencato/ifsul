package Model;

public class Passaro extends Animal{

	public Passaro() {
	}

	public Passaro(double x, double y) {
		super(x, y);
	}

	@Override
	public void desenhar() {
		System.out.println("\nDesenhou um Pássaro.");
	}
}
