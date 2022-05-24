#include <bits/stdc++.h>
using namespace std;

int arr[3] {1,3,5}; 
int n;
void f(int apos, int spos, int* sub, int size)
{
    if(apos == 3)
    {
        if(size != 0)
        {
            for(int i = 0; i < size; i++)
            {
                cout << sub[i] << " ";
            }
            cout << endl;
        }else cout << "[]" << endl;
        return;
    }
    f(apos+1,spos,sub,size);
    sub[spos] = arr[apos];
    f(apos+1,spos+1,sub,size+1);
}

vector<int> subset;
void gen(int pos) // mujahid bhai
{
    if(pos == n)
    {
        for(int x : subset) cout << x << " "; cout << endl;
        return; 
    }

    subset.push_back(arr[pos]);
    gen(pos+1);
    subset.pop_back();
    gen(pos+1);
}

int main()
{
    int sub[3]{0};
    f(0,0,sub,0);
    cout << "------------" << endl;
    n = 3;
    gen(0);

}