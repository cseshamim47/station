#include <bits/stdc++.h>
using namespace std;
int main()
{
    int notes[] = {100, 50, 20, 10, 5, 2};
    double coins[] = {1, 0.50, 0.25, 0.10, 0.05, 0.01};
    int nanswer[6],input,count = 0;
    int canswer[6] = {0};
    double dinput;

    cin >> dinput;
    input = (int)dinput;
    cout << "NOTAS:" << endl;
    for(int i = 0; i < 6; i++){
        nanswer[i] = input/notes[i];
        input = input % notes[i];
        cout << nanswer[i] << " nota(s) de R$ " << notes[i] << ".00" << endl;
        count += notes[i]*nanswer[i];
    }
    dinput = dinput - count;
    
    cout << "MOEDAS:" << endl;
    double eps = 0.000000001;
    for(int i = 0; i < 6; i++){
        while(dinput + eps - coins[i] >= 0){
            cout << "Checking : " << dinput + eps - coins[i] << endl; 
            canswer[i] += 1;
            dinput -= coins[i];
        }
        // if(i == 5) cout << "Checking : " << dinput - coins[i] << endl; 
        cout << canswer[i] << " moeda(s) de R$ " << fixed << setprecision(2) << coins[i] << endl; //45.65 right answer 45.66
        // cout << "dinput : " << dinput << endl;

    }
}