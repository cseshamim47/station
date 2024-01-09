#include <iostream>

using namespace std;

int main()
{
    int x;
    int a=10;
    int b=12;
    int sum = 22;
    int sumInput;
    int score=0;
    cout << "Lets Play a game. I'll ask you number of questions. You'll have to answer!! \n" << endl;
    cout << "Press 1 to begin.\nPress 0 to exit.\n" << endl;
    cout << "      " ;
    cin >> x;
    cout << "\nYou'll get: \n10 mark for correct answer.\n-5 mark for wrong answer." << endl;
    if(x==1){
        cout << "\nHow much is 10+12 = ?" << endl;
        cout << "Answer : ";
        cin >> sumInput;
        if (sumInput == sum) {
            cout << "\nCorrect answer!!" << endl;
            score = 10;
            cout << "Score : 10" << endl;
            cout << "\nPress 2 for next question." << endl;
            cout << "      " ;
            cin >> x;
        }else{
            cout << "\aWrong answer!!" << endl;
            score = -5;
            cout << "Score : -5" << endl;
            cout << "\nPress 2 for next question." << endl;
            cout << "      " ;
            cin >> x;
            }
    }if(x==2) {
        cout << "\nHow much is 10 X 12 = ?" << endl;
        cout << "Answer : ";
        sum = 120;
        cin >> sumInput;
        if (sumInput == sum) {
            cout << "\nCorrect answer!!" << endl;
            score = score + 10;
            cout << "Score : " << score << endl;
            cout << "\nPress 3 for next question." << endl;
            cout << "      " ;
            cin >> x;
        }else{
            cout << "\aWrong answer!!" << endl;
            score = score - 5;
            cout << "Score : " << score << endl;
            cout << "\nPress 3 for next question." << endl;
            cout << "      " ;
            cin >> x;
            }

    }if(x==3){
        cout << "\nHow much is 10 / 2 = ?" << endl;
        cout << "Answer : ";
        sum = 6;
        cin >> sumInput;
        if (sumInput == sum) {
            cout << "\nCorrect answer!!" << endl;
            score = score + 10;
            cout << "Score : " << score << endl;
            cout << "\nPress 4 for next question." << endl;
            cout << "      " ;
            cin >> x;
        }else{
            cout << "\aWrong answer!!" << endl;
            score = score -5;
            cout << "Score : " << score << endl;
            cout << "\nPress 4 for next question." << endl;
            cout << "      " ;
            cin >> x;
            }
    }if (x == 0) {
        cout << "Enter to exit.";
    }


}





