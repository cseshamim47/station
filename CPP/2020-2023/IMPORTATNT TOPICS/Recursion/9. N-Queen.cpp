#include <bits/stdc++.h>
using namespace std;


int n;
const int N = 1000;
bool leftSide[N+1];
bool lowerDiagonal[2*N];
bool upperDiagonal[2*N];

bool isSafe(int r, int c)
{
    if(leftSide[r]) return false;
    if(lowerDiagonal[r+c]) return false;
    if(upperDiagonal[(n-1)+(c-r)]) return false;
    return true;
}
void solve(int idx,vector<string> &v) // O(n! * n)
{
    if(idx == n)
    {
        for(auto x : v) cout << x << endl;
        cout << endl;
        return;
    }

    for(int i = 0; i < n; i++) 
    {
        if(isSafe(i,idx)) 
        {
            v[i][idx] = 'Q';
            leftSide[i] = true;
            lowerDiagonal[i+idx] = true;
            upperDiagonal[(n-1)+(idx-i)] = true;
            solve(idx+1,v);
            v[i][idx] = '.';
            leftSide[i] = false;
            lowerDiagonal[i+idx] = false;
            upperDiagonal[(n-1)+(idx-i)] = false;
        }
    }

}

int main()
{
    cin >> n;
    string str(n,'.');
    vector<string> v(n,str);
    solve(0,v);
}