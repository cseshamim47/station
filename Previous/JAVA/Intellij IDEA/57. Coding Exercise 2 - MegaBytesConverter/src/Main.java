public class Main {

    public static void printMegaBytesAndKiloBytes(int kiloBytes){
        int mb = kiloBytes/1024;
        int remainder = kiloBytes%1024;
        if(kiloBytes>0)
        System.out.println(kiloBytes + " KB = "
        + mb + " MB and "+remainder + " KB");
        else System.out.println("Invalid Value");
    }
    

    public static void main(String[] args) {
        printMegaBytesAndKiloBytes(2500);
    }
}
