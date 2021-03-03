public class Main {

    public static void main(String[] args) {

        calculateScore(true,5,100,500);

        int score = 10000;
        int levelCompleted = 8;
        int bonus = 200;
        boolean gameOver = true;
        System.out.println("My finalScore got duplicated : "+calculateScore(gameOver,levelCompleted,bonus,score));

        displayHighScorePosition("Md Shamim Ahmed",2);

        System.out.println(calculateHighScorePositon(1500));
        System.out.println(calculateHighScorePositon(900));
        System.out.println(calculateHighScorePositon(400));
        System.out.println(calculateHighScorePositon(50));
    }


    // when a method has returning type the return keyword must be used. If using if-then statement, have to use return keyword in all cases.
    public static int calculateScore(boolean gameOver, int levelCompleted, int bonus, int score){
        int finalScore = score+(levelCompleted * bonus);
        finalScore+=100;
        if(gameOver){
            System.out.println("Your final score was "+finalScore);
            return finalScore;
        }else return -1;   // -1 is considered to be false in programming langugage
    }


    //Challenge

    public static void displayHighScorePosition(String playerName, int postion){
        System.out.println(playerName + " managed to get into positon " + postion + " on the high score table");
    }

    public static int calculateHighScorePositon(int playerScore){
        if(playerScore>=1000){
            return 1;
        }else if(playerScore>=500 && playerScore<1000){
            return 2;
        }else if(playerScore>=100 && playerScore<500){
            return 3;
        }else return 4;
    }

}
