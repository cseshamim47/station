
enum Status{
    Pending,Success,Error,Shamim;
}


public class Main {
    public static void main(String[] args) {
        Status[] s = Status.values();

        for(Status x: s){
            System.out.println(x + " " + x.ordinal());
        }

    }
}
