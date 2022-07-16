public class SpeedConverter {


    public static long toMilesPerHour(double kilometersPerHour){
        if(kilometersPerHour<0){
            return -1;
        }else {
            return Math.round(kilometersPerHour/1.609);
        }
    }

    public static void printConversion(double kilometersPerHour){
        if(kilometersPerHour<0) System.out.println("Invalid Value");
        else
        System.out.println(kilometersPerHour+ " km/h = "+ toMilesPerHour(kilometersPerHour) + " mi/h");
    }

    public static void main(String[] args) {
        System.out.println(toMilesPerHour(75.114));
        printConversion(25.42);
    }

}
