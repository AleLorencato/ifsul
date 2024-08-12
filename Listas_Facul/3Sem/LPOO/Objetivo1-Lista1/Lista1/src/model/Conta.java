package model;

public class Conta {
    private int id;
    private double saldo;

    public Conta(){}

    public Conta(int id, double saldo) {
        this.id = id;
        this.saldo = saldo;
    }

    public Conta(int id) {
        this.id = id;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public double getSaldo() {
        return saldo;
    }

    public void setSaldo(double saldo) {
        this.saldo = saldo;
    }

    public void deposita(double valor){
        this.saldo += valor;
    }

    public void saca(double valor){
        this.saldo -= valor;
    }
    public void atualiza(double taxa) {
        this.saldo += this.saldo * (taxa/100);
    }

    @Override
    public String toString() {
        return "\nConta{" +
                "id=" + id +
                ", saldo=" + saldo +
                '}';
    }
}
