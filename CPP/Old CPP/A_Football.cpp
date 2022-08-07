//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;

int main()
{
    string n;
    cin >> n;

    for(int i = 0; i < n.size(); i++){
        int cnt = 0;
        for(int j = i+1; j < n.size(); j++){
            if(n[i] == n[j]) cnt++;
            else break;
        }
        if(cnt >= 6){
            cout << "YES" << "\n";
            return 0;
        }
    }
    cout << "NO" << "\n";

}