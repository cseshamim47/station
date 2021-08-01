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
            canswer[i] += 1;
            dinput -= coins[i];
        }
        cout << canswer[i] << " moeda(s) de R$ " << fixed << setprecision(2) << coins[i] << endl; //45.65 right answer 45.66
        // cout << "dinput : " << dinput << endl;

    }


    // double amount;
    // cin >> amount;
    // int temp = amount*100;
    // int t = temp / 100;
    // int p = temp % 100;
    // // cout << t << " " << p << endl;

    // cout << "NOTAS:" << endl;
    // int notes[6] = {100, 50, 20, 10, 5, 2};

    // for(int i = 0; i < 6; i++){
    //     cout << t/notes[i] << " nota(s) de R$ " << notes[i] << ".00" << endl;
    //     t %= notes[i];
    // }

    // p += t*100; 
    // cout << "MOEDAS:" << endl;
    // int coins[6] = {100, 50, 25, 10, 5, 1};

    // for(int i = 0; i < 6; i++){
    //     cout << p/coins[i] << " moeda(s) de R$ " << fixed << setprecision(2) << coins[i]/100.0 << endl;
    //     p %= coins[i];
    // }
    
}