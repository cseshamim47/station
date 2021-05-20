#include <bits/stdc++.h>
 
using namespace std;
 
int main() {
    int note[] = {100,50,20,10,5,2,1};

    int money[7], input, i;

    cin >> input;
    cout << input << endl;

    for(i = 0; i < 7; i++){
        money[i] = input / note[i];
        input = input % note[i];
        cout << money[i] << " nota(s) de R$ " << note[i] << ",00" << endl;

    }

    // for(i = 0; i < 7; i++){
    //     cout << money[i] << " nota(s) de R$ " << note[i] << ",00" << endl;
    // }

}