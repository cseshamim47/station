

public class test {

    public static void main(String[] args){

        abstraction objRef = new child();
        objRef.myMethod();
        System.out.println(objRef.x);
        
    }
}



//// create a string of all characters
//        String alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//
//        // create random string builder
//        StringBuilder sb = new StringBuilder();
//
//        // create an object of Random class
//        Random random = new Random();
//
//        // specify length of random string
//        int length = 4;
//
//        for(int i = 0; i < length; i++) {
//
//            // generate random index number
//            int index = random.nextInt(alphabet.length());
//
//            // get character specified by index
//            // from the string
//            char randomChar = alphabet.charAt(index);
//
//            // append the character to string builder
//            sb.append(randomChar);
//
//
//        }
//        String randomString = sb.toString();
//        System.out.print(randomString + " ");

//        LocalDate today = LocalDate.now(); // Create a date object
//        System.out.println("a. "  + today); // Display the current date
//        System.out.println("b. "  + today.plusDays(1)); // Display the current+1 date
//        System.out.println("c. "  + today.plusDays(2)); // Display the current+2 date
//
//        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("LLLL dd yyyy"); // Date format for convering to string
//        String strToday = today.plusDays(1).format(formatter);// converting to string
//
//        System.out.println(strToday);