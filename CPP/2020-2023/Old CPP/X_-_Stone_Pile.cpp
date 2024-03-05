#include <iostream>
#include <vector>
using namespace std;

vector<int> v;
vector<int> ans;
int sz;
int uttor; 
int sum;

void f(int i)
{
    if(i == sz)
    {
        int tmp = 0;
        for(int k = 0; k < ans.size(); k++)
        {
            tmp += ans[k];   
        }
        uttor = min(uttor,abs((sum-tmp)-tmp));
        return;
    }
    ans.push_back(v[i]);
    f(i+1);
    ans.pop_back();
    f(i+1);
}

int Case;
void solve()
{
    int n;
    cin >> n;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        sum += x;
        v.push_back(x);
    }
    sz = v.size();
    uttor = INT_MAX;
    f(0);
    cout << uttor << endl;
}

int main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}