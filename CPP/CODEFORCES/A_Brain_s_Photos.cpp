#include <bits/stdc++.h>
using namespace std;

int main()
{
    char ch;
    int r,c;
    cin >> r >> c;
    int count = 0;
    for(int i = 0;i < r*c; i++){
        cin >> ch;
        if(ch == 'W' || ch == 'B' || ch == 'G') count++;
    }

    if(count == r*c) cout << "#Black&White\n";
    else cout << "#Color\n";
    
}