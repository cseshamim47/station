public class Main {

    Main() {
        System.out.println("Default");
    }
    public static String getDurationString(long minute, long second){
        if(0>minute && (0>second || second>59)) return "Invalid Value";
        else {
            long hour = minute / 60;
            long remainingMinutes = minute % 60;
            if(String.valueOf(hour).length()==1){
                if(String.valueOf(remainingMinutes).length()==1){
                    if(String.valueOf(second).length()==1){
                        return "0"+hour + "h 0" + remainingMinutes + "m 0" + second + "s";
                    }else return "0"+hour + "h 0" + remainingMinutes + "m " + second + "s";
                }else if(String.valueOf(second).length()==1)
                    return "0"+hour + "h " + remainingMinutes + "m 0" + second + "s";
                else
                    return "0"+hour + "h " + remainingMinutes + "m " + second + "s";
            }else return hour + "h " + remainingMinutes + "m " + second + "s";
        }
    }

    public static String getDurationString(long seconds){
        if(seconds < 0){
            return "Invalid value";
        }
        long minutes = seconds / 60;
        long remainingSeconds = seconds % 60;
        return getDurationString(minutes, remainingSeconds);
    }


    public static void main(String[] args) {
        System.out.println(getDurationString(125,59));
        System.out.println(getDurationString(-1,-1));
        System.out.println(getDurationString(75,9));
        System.out.println(getDurationString(75,19));
        System.out.println(getDurationString(65,0));
        System.out.println(getDurationString(65,45));
        System.out.println(getDurationString(3945L));
    }
}
