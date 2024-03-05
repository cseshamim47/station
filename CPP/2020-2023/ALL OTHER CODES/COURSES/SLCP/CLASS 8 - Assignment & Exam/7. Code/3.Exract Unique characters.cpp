#include <bits/stdc++.h>
using namespace std;

void solve()
{
    string str;
    cin >> str;

    int hash[26] = {0};
    for(int i = 0; i < str.size(); i++)
    {
       hash[str[i]-'a']++; 
       if(hash[str[i]-'a'] == 1) cout << str[i];
    }
    cout << endl;
}

int main()
{
    solve();    
}