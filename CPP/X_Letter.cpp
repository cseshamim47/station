#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    string head;
    getline(cin,head);
    string text;
    getline(cin,text);

    int lc[26] = {0},uc[26]={0};
    for(int i = 0; i < head.size(); i++)
    {
        if(head[i] == ' ') continue;
        if(isupper(head[i])) uc[head[i]-'A']++;
        else lc[head[i]-'a']++;
    }
    for(int i = 0; i < text.size(); i++)
    {
        if(text[i] == ' ') continue;
        if(isupper(text[i]))
        {
            int idx = text[i] - 'A';
            uc[idx]--;
            if(uc[idx] < 0) 
            {
                cout << "NO" << endl;
                return;
            }
        }else
        {
            int idx = text[i]-'a';
            lc[idx]--;
            if(lc[idx] < 0)
            {
                cout << "NO" << endl;
                return;
            }
        }
    }
    cout << "YES" << endl;

}

int main()
{
      //        Bismillah
    // w(t)
    solve();
}

// Instead of dogging your footsteps it disappears but you dont notice anything
// Your dog is upstears  -> no

// Instead of dogging Your footsteps it disappears but you dont notice anything
// Your dog is upstears