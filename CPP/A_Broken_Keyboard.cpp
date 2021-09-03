#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    string str;
    cin >> str;
    set<char> cs;
    int sizee = (int)str.size();
    for(int i = 0; i < sizee; i++)
    {
        if(str[i] == str[i+1]) i++;
        else cs.insert(str[i]);
    }

    for(auto it : cs) cout << it;
    cout << "\n";
}

int main()
{
    w(t)
}


// abceeffabddd
