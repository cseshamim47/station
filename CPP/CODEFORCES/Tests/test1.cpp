#include <bits/stdc++.h>
using namespace std;

int main(){
    int  count, i;
     cin >> count;
  int  input[count], output[count];
    for(i = 0; i < count; i++){
        cin >> input[i];
    }

    for(i = 0; i < count; i++){
        output[i] = input[count-i-1];

    }
    for(i = 0; i < count; i++){
        if(i != count-1) cout << output[i] <<" ";
        else cout << output[i];
    }
    return 0;
}