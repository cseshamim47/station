#include <iostream>

using namespace std;

int main()
{
    int age;
    int totalAge = 0;
    int average = 0;

    cout << "please enter first persons age or -1 to exit: " ;
    cin >> age;

    while(age != -1){
        totalAge = totalAge + age;
        average++;
        cout << "please enter next persons age or -1 to exit: " ;
        cin >> age;
    }

    cout << "\nTotal age = " << totalAge << endl;
    cout << "People entered = " << average << endl;
    cout << "Average age = " << totalAge/average << endl;

    return 0;
}
