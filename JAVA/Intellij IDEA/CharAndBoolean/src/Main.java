public class Main {

    public static void main(String[] args) {
	    char myCharValue = 'D';

	    char myUnicodeCharValue = '\u0044';             //https://unicode-table.com/en
        System.out.println(myCharValue);
        System.out.println(myUnicodeCharValue);
        char myBanglaUnicodeCharOne = '\u09f0';
        char myBanglaUnicodeCharTwo = '\u09be';
        char myBanglaUnicodeCharThree = '\u0982';
        char myBanglaUnicodeCharFour = '\u09b2';
        char myBanglaUnicodeCharFive = '\u09be';
        System.out.print(myBanglaUnicodeCharOne);
        System.out.print(myBanglaUnicodeCharTwo);
        System.out.print(myBanglaUnicodeCharThree);
        System.out.print(myBanglaUnicodeCharFour);
        System.out.println(myBanglaUnicodeCharFive);

        boolean myTrueBoolValue = true;
        boolean myFalseBoolValue = false;

        boolean isImTellingTruth = true;
        System.out.println(isImTellingTruth);
    }
}
