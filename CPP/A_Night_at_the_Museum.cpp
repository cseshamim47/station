#include <bits/stdc++.h>
using namespace std;

int main()
{
    char ch[] = "abcdefghijklmnopqrstuvwxyz";

    string str;
    cin >> str;
    char initialPos = 'a';
    int ans = 0;
    for(int i = 0; i < str.size(); i++){
        int x = min(abs(initialPos-str[i]),26-abs(str[i]-initialPos));
        initialPos = str[i];
        ans += x;
    }
    cout << ans << endl;
    
}