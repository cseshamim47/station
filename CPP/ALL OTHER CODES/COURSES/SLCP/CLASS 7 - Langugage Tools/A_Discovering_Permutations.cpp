#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

int Case;
void solve()
{
    cout << "Case " << ++Case << ":\n";
    int n,k;
    cin >> n >> k;
    string str = "";
    char a = 'A';
    for(char i = 0; i < n; i++)
    {
        str.push_back(a++);
    }
    int cnt = 0;
    do
    {
        cout << str << endl;
        cnt++;
    }while(next_permutation(str.begin(),str.end()) && cnt != k);

}

// min(n*n!, n*k);

int main()
{
      //        Bismillah
    w(t)
    
}